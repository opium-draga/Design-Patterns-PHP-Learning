<?php

/**
 * Class VideoFile
 * Subsystem class
 */
class VideoFile
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }
}

/**
 * Class CodecFactory
 * Subsystem class
 */
class CodecFactory
{
    public static function getCodec($format)
    {
        switch ($format) {
            case 'q':
                // new SomeConcreteCodec
                return [];
                break;

            default:
                return [];
                // new SomeConcreteCodec2
        }
    }
}

/**
 * Class VideoConverter
 * Facade for working with video
 */
class VideoConverter
{
    public function convert($filename, $format)
    {
        $file = new VideoFile($filename);
        $codec = CodecFactory::getCodec($format);

        // pseudo-code
        $newFIle = $codec->convert($file);
        return $newFIle;
    }
}

$convertor = new VideoConverter();
$oggVideo = $convertor->convert('youtube.link.mp4', 'ogg');