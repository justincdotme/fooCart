<?php namespace fooCart\src\Image;

use fooCart\src\Image\Interfaces\ImageCropInterface;
use fooCart\Http\Requests;
use Imagick;

/**
 * Class ImageCropper
 *
 * This class contains 1 method: crop().
 *
 * This implementation of the ImageCropper class uses the PHP ImageMagick extension for
 * cropping images that are uploaded through the product management or slideshow management modules.
 * This ImageCropper implementation has been bound to an interface via ImageCropServiceProvider to allow for easy updating
 * if a different image manipulation implementation is used in the future.
 * This class implements the ImageCropInterface
 *
 *
 * PHP Version 5.6
 *
 * License: Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package fooCart
 * @author Justin Christenson <info@justinc.me>
 * @version 1.0.0
 * @license http://opensource.org/licenses/mit-license.php
 * @link https://foocart.justinc.me
 *
 */

class ImageCropper implements ImageCropInterface {

    /**
     * Crop the uploaded image.
     * This implementation uses the Imagick PHP class.
     *
     * @param $cropParams
     * @return bool
     */
    public function crop($cropParams)
    {
        $imagick = new Imagick(public_path() . $cropParams['request']->input('imgUrl'));
        //Scale the image down
        $imagick->thumbnailImage($cropParams['request']->imgW, $cropParams['request']->imgH);
        //Apply cropping
        $imagick->cropImage($cropParams['request']->cropW, $cropParams['request']->cropH, $cropParams['request']->imgX1, $cropParams['request']->imgY1);
        //Write to disk
        if($imagick->writeImage(public_path() . $cropParams['img_final_dir'] . $cropParams['image_out']))
        {
            //Delete the temp image.
            if(unlink(public_path() . $cropParams['request']->input('imgUrl')))
            {
                return true;
            }
            return false;
        }
    }
}