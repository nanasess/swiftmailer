<?php

/**
 * @group smoke
 */
class Swift_Smoke_LoggerSmokeTest extends SwiftMailerSmokeTestCase
{
    public function testLogger()
    {
        $mailer = $this->_getMailer();
        $logger = new \Swift_Plugins_Loggers_EchoLogger();
        $mailer->registerPlugin(new \Swift_Plugins_LoggerPlugin($logger));
        $message = Swift_Message::newInstance()
            ->setSubject('[Swift Mailer] BasicSmokeTest')
            ->setFrom(array(SWIFT_SMOKE_EMAIL_ADDRESS => 'Swift Mailer'))
            ->setTo(SWIFT_SMOKE_EMAIL_ADDRESS)
            ->setBody('One, two, three, four, five...'.PHP_EOL.
                'six, seven, eight...'
                )
            ;
        $this->assertEquals(1, $mailer->send($message),
            '%s: The smoke test should send a single message'
            );
    }
}
