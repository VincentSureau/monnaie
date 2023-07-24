<?php

/**
 * PHP Package Boilerplate (https://github.com/tomkyle/boilerplate-php)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests;

use Psr;
use Laminas;

trait LoggerTrait
{
    use Psr\Log\LoggerAwareTrait;

    /**
     * PSR Loglevel
     * @var int
     */
    public $loglevel = Laminas\Log\Logger::ALERT;


    /**
     * Output stream name
     * @var string
     */
    public $log_stream = 'php://output';


    /**
     * @return \Psr\Log\LoggerInterface
     */
    protected function getLogger(): Psr\Log\LoggerInterface
    {
        if ($this->logger) {
            return $this->logger;
        }

        $laminas_logger = $this->createLaminasLogger();
        $psr_logger = new Laminas\Log\PsrLoggerAdapter($laminas_logger);

        $this->setLogger($psr_logger);

        return $this->logger;
    }


    /**
     * @return \Laminas\Log\Writer\Stream
     */
    protected function createLaminasLogWriter(): Laminas\Log\Writer\AbstractWriter
    {
        $loglevel = ($GLOBALS['LAMINAS_LOGLEVEL'] ?? $this->loglevel) ?: $this->loglevel;
        $filter = new Laminas\Log\Filter\Priority($loglevel);

        $writer = new Laminas\Log\Writer\Stream($this->log_stream);
        $writer->addFilter($filter);

        return $writer;
    }


    /**
     * @return \Laminas\Log\Logger
     */
    protected function createLaminasLogger(): Laminas\Log\LoggerInterface
    {
        $laminasLogLogger = new Laminas\Log\Logger();
        $laminasLogLogger->addProcessor(new Laminas\Log\Processor\PsrPlaceholder);

        $writer = $this->createLaminasLogWriter();
        $laminasLogLogger->addWriter($writer);

        return $laminasLogLogger;
    }
}
