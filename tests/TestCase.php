<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $response;

    /**
     * Helper method to test that a specific field has a validation error.
     *
     * @param $field
     */
    protected function assertFieldHasValidationError($field)
    {
        $jsonResponse= $this->response->decodeResponseJson()->json();
        if (!array_key_exists('errors', $jsonResponse)) {
            $this->fail('There is no errors array');
        }
        $this->response->assertStatus(422);
        $this->assertArrayHasKey($field, $jsonResponse['errors']);
    }

    /**
     * Render the contents of a mailable.
     * Allows us to run assertions against it's contents.
     *
     * @param $mailable
     * @return string
     */
    protected function renderMailable($mailable)
    {
        $mailable->build();
        return view(
            $mailable->view,
            $mailable->buildViewData()
        )->render();
    }
}
