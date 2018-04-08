<?php

/**
 * Interface DataSource
 * Component interface for all Wrappers and Concrete objects
 */
interface DataSource
{
    public function write($data);

    public function read();
}

/**
 * Class FileDataSource
 * Concrete class
 */
class FileDataSource implements DataSource
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function write($data)
    {
        echo("write to file...");
    }

    public function read()
    {
        echo("read from file...");
    }
}

/**
 * Class DataSourceDecorator
 * Base Decorator
 */
class DataSourceDecorator implements DataSource
{
    protected $dataSource;

    public function __construct(DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function write($data)
    {
        $this->dataSource->write($data);
    }

    public function read()
    {
        $this->dataSource->read();
    }
}

/**
 * Class EncryptionDataSource
 * Concrete decorator
 */
class EncryptionDataSource extends DataSourceDecorator
{
    public function write($data)
    {
        echo("encrypt data...");
        parent::write($data);
    }

    public function read()
    {
        echo("decode data...");
        parent::read();
    }
}

/**
 * Class CompressDecorator
 * Concrete decorator
 */
class CompressDecorator extends DataSourceDecorator
{
    public function write($data)
    {
        echo("compress data...");
        parent::write($data);
    }

    public function read()
    {
        echo("uncompress data...");
        parent::read();
    }
}

// example 1
$source = new FileDataSource("file.txt");
$source->write([1, 2, 3]);

$source = new CompressDecorator($source);
$source->write([1,2,3]);

$source = new EncryptionDataSource($source);
$source->write([1,2,3]);

// example 2
echo("</br>");
$source = new EncryptionDataSource(
    new CompressDecorator(
        new FileDataSource("file.txt")
    )
);

$source->write([1,2,3]);