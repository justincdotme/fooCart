<?php namespace fooCart\Http\Controllers;

use fooCart\src\Image\Traits\ImageUploadTrait;
use SplFileInfo;
use Symfony\Component\HttpFoundation\Response;
use fooCart\src\ProductImage;
use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Imagick;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;


class ProductImageController extends Controller {

    protected $_cropper;
    protected $_productImage;
    protected $_request;
    protected $_errorMessage;
    protected $_tmpPath;
    protected $_fileName;
    protected $_width;
    protected $_height;

    public function __construct(Request $request, ProductImage $productImage)
    {
        $this->_cropper = App::make('fooCart\src\Image\Interfaces\ImageCropInterface');
        $this->_productImage = $productImage;
        $this->_request = $request;
        $this->_errorMessage = 'An error has occurred, please try again.';
        $this->_tmpPath = '/images/products/tmp/';
    }

    /**
     * Save the uploaded image.
     * Uses uploadImage() from ImageUploadTrait.
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
     * @return Response
     * @internal param Request $request
     * @internal param ImageCropperInterface $cropper
     */

    public function crop()
    {
        $productId = $this->_request->input('product_id');
        $imgInfo = new SplFileInfo($this->_request->imgUrl);

        $cropParams = [
            'img_final_dir' => '/images/products/',
            'image_out' => $productId . '-' . uniqid() . '.' . $imgInfo->getExtension(),
            'request' => $this->_request
        ];

        $imageOut = $cropParams['img_final_dir'] . $cropParams['image_out'];

        if($this->_cropper->crop($cropParams))
        {
            try {
                $this->_productImage->image_path = $imageOut;
                $this->_productImage->product_id = $productId;
                $this->_productImage->save();

                return response()->json([
                    'status' => 'success',
                    'url' => $imageOut,
                    'img_id' => $this->_productImage->image_id
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
     * Delete the image.
     * Unlink image from filesystem.
     * Remove image from the database.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $image = $this->_productImage->findOrFail($id);
        $filePath = public_path() . $image->image_path;

        try {
            DB::beginTransaction();
            unlink($filePath);
            $image->delete();
            DB::commit();
        } catch(Exception $e)
        {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => $this->_errorMessage
            ]);
        }
        return response()->json([
            'status' => 'success'
        ]);
    }
}
