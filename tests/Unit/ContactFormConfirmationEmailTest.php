<?php

namespace Tests\Unit;

use App\Mail\ContactFormConfirmation;
use Tests\TestCase;

class ContactFormConfirmationEmailTest extends TestCase
{
    /**
     * @test
     */
    public function email_contains_form_data()
    {
        $formData = [
            'name' => 'Foo McBar',
            'email' => '...',
            'phone' => '...',
            'message' => '...'
        ];
        $email = new ContactFormConfirmation($formData);

        $rendered = $this->renderMailable($email);

        $this->assertStringContainsString($formData['name'], $rendered);
    }

    /**
     * @test
     */
    public function email_has_subject()
    {
        $email = new ContactFormConfirmation([
            'name' => '...',
            'email' => '...',
            'phone' => '...',
            'message' => '...'
        ]);

        $this->assertEquals('Thank you, we will be in touch', $email->build()->subject);
    }
}
