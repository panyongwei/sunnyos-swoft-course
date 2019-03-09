<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Commands;

use Swoft\Console\Bean\Annotation\Command;
use Swoft\Console\Input\Input;
use Swoft\Console\Output\Output;
use Swoft\Process\ProcessBuilder;

/**
 * This is a example command class
 * @Command(coroutine=false)
 * @package App\Commands
 */
class SunnyCommand{
    /**
     * this is a example command
     * @Usage {command} [arguments ...] [--options ...]
     * @Arguments
     *   first STRING        The first argument value
     *   second STRING       The second argument value
     * @Options
     *   --opt STRING        This is a long option
     *   -s BOOL             This is a short option(<comment>use color</comment>)
     * @Example {command} FIRST SECOND --opt VALUE -s
     * @param Input $input
     * @param Output $output
     * @return int
     */
    public function process(Input $input, Output $output): int
    {
        ProcessBuilder::create("sunny")->start();
        $output->writeln('hello, this is ' . __METHOD__);

        return 0;
    }
}
