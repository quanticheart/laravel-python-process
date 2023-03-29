<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function command()
    {
        $arg = "command";
        $command = escapeshellcmd("python3 " . app_path() . '/Python/password.py ' . $arg);
        $output = shell_exec($command);
        return $output;
    }

    public function process()
    {
        $arg = "process";
        $process = new Process(['python3', app_path() . '/Python/password.py', $arg]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $data = $process->getOutput();

        return $data;
    }


}
