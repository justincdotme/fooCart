<?php namespace fooCart\src\Image\Traits;

/**
 *Trait ImageUploadTrait
 *
 * This trait contains 1 method: uploadImage()
 *
 * The uploadImage() method in this trait is used by the SlideshowController and ProductImageControllers.
 * The uploadImage() method was abstracted to a trait simply to follow DRY principals.
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

trait ImageUploadTrait {

    /**
     * Save an uploaded image to the filesystem.
     *
     * @return bool
     */
    public function uploadImage()
    {
        $file = $this->_request->file('img');

        //Ensure that the uploaded file meets the following requirements
        //1. File is not null
        //2. File is an image
        //3. Image mime type is allowed
        //4. File was successfully uploaded via POST
        if(is_null($file))
        {
            return false;
        }
        $imageInfo = getimagesize($file);
        if(!$imageInfo)
        {
            return false;
        }

        $fileType = image_type_to_mime_type(exif_imagetype($file));
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if(!in_array($fileType, $allowedTypes))
        {
            return false;
        }

        if(!$file->isValid())
        {
            return false;
        }
        $this->_fileName = $file->getClientOriginalName();
        $image = new \Imagick($file->getRealPath());
        $this->_height = $image->getImageHeight();
        $this->_width = $image->getImageWidth();
        $file->move(public_path() . $this->_tmpPath, $this->_fileName);

        return true;
    }
}