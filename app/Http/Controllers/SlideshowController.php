<?php namespace fooCart\Http\Controllers;

use fooCart\src\Image\Traits\ImageUploadTrait;
use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use Illuminate\Http\Request;
use fooCart\src\Slideshow;
use fooCart\src\Slide;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Exception;
use Imagick;

class SlideshowController extends Controller {

    protected $_cropper;
    protected $_slide;
    protected $_request;
    protected $_errorMessage;
    protected $_slideshow;
    protected $_tmpPath;
    protected $_fileName;
    protected $_width;
    protected $_height;

    public function __construct(Request $request, Slide $slide, Slideshow $slideshow)
    {
        $this->_cropper = App::make('fooCart\src\Image\Interfaces\ImageCropInterface');
        $this->_slide = $slide;
        $this->_request = $request;
        $this->_errorMessage = 'An error has occurred, please try again.';
        $this->_slideshow = $slideshow;
        $this->_tmpPath = '/images/slideshows/1/tmp/';
    }

	/**
	 * Display the slideshow editor page.
	 *
	 * @return Response
	 */
	public function index()
	{
        $slides = Cache::rememberForever('slides', function()
        {
            return $this->_slideshow->findOrFail(1)->slides()->orderBy('sequence')->get();
        });

        $slideCount = count($slides);
		return view('admin.edit-slideshow')
            ->withSlides($slides)
            ->withCount($slideCount);
	}

	/**
	 * Display the page for adding a new slide.
	 *
	 * @return Response
	 */
	public function create()
	{
        $slides = $this->_slideshow->findOrFail(1)->slides()->get();
        $count = count($slides);
		return view('admin.add-slide')
            ->withCount($count);
	}

    /**
     * Save the uploaded image.
     *
     * @return Response
     * @internal param Request $request
     */
    use ImageUploadTrait;
	public function store()
	{
        if($this->uploadImage())
        {
            return response()->json([
                'status' => 'success',
                'url' => $this->_tmpPath . $this->_fileName,
                'width' => $this->_width,
                'height' => $this->_height
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => $this->_errorMessage
        ]);
	}

    /**
     * Crop the uploaded image.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param Request $request
     */
    public function crop()
    {
        $cropParams = [
            'img_final_dir' => '/images/slideshows/1/',
            'image_out' => uniqid(),
            'request' => $this->_request
        ];

        $imageOut = $cropParams['img_final_dir'] . $cropParams['image_out'];

        if($this->_cropper->crop($cropParams))
        {
            try {
                $this->_slide->slideshow_id = $this->_request->input('slideshow');
                $this->_slide->sequence = $this->_request->input('count') + 1;
                $this->_slide->image_path = $imageOut;
                $this->_slide->active = true;
                $this->_slide->save();

                //Reset the cache
                Cache::forget('slides');
                Cache::rememberForever('slides', function()
                {
                    return $this->_slideshow->findOrFail(1)->slides()->orderBy('sequence')->get();
                });

                return response()->json([
                    'status' => 'success',
                    'url' => $imageOut,
                    'img_id' => $this->_slide->slide_id
                ]);
            } catch(Exception $e)
            {
                return response()->json([
                    'status' => 'error',
                    'message' => $this->_errorMessage
                ]);
            }
        }
        return response()->json([
            'status' => 'error',
            'message' => $this->_errorMessage
        ]);
    }

    /**
     * Update an existing slide.
     *
     * @param $slide_id
     * @return Response
     * @internal param Request $request
     */
	public function update($slide_id)
	{
        try {
            $slide = $this->_slide->findOrFail($slide_id);
            $slide->slideshow_id = 1;
            $slide->href = $this->_request->input('href');

            //Ensure that href begins with protocol
            if ($slide->href != '' && !preg_match("~^(?:f|ht)tps?://~i", $slide->href)) {
                $slide->href = "http://" . $slide->href;
            }

            $slide->sequence = $this->_request->input('sequence');
            $slide->active = $this->_request->input('active');
            $slide->save();
        } catch(Exception $e)
        {
            return response()->json([
                'status' => 'error',
                'error' => $this->_errorMessage
            ]);
        }

        //Reset the cache
        Cache::forget('slides');
        Cache::rememberForever('slides', function()
        {
            return $this->_slideshow->findOrFail(1)->slides()->orderBy('sequence')->get();
        });

        return response()->json([
            'status' => 'success'
        ]);
	}

    /**
     * Delete the image.
     * Unlink image from filesystem.
     * Remove image from the database.
     *
     * @param $slide_id
     * @return Response
     */

    public function destroy($slide_id)
    {
        $slide = $this->_slide->findOrFail($slide_id);
        $slide->delete();
        Cache::forget('slides');
        $filePath = public_path() . $slide->image_path;

        try {
            DB::beginTransaction();
            unlink($filePath);
            $slide->delete();
            DB::commit();
        } catch(Exception $e)
        {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => $this->_errorMessage
            ]);
        }

        //Reset the cache
        Cache::forget('slides');
        Cache::rememberForever('slides', function()
        {
            return $this->_slideshow->findOrFail(1)->slides()->get();
        });

        return redirect('admin/slideshow');
    }
}