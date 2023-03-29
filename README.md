## How To Run Python Script In Laravel/PHP

- #### Step 1: Write a simple Python Script

Create your python script and place it in some folder in app, in this example I created a folder named [Python](app/Python) in app.

- #### Step 2: Run Python Code in Laravel

The laravel provides a process() method for running the script. The Process component executes commands in sub-processes. So, install the process package using the below command.

```
composer require symfony/process
```

After installing the package we will create a function and run the python script.

In the controller include a symphony process component.


````
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

 public function process()
    {
        $arg = "process";
        $process = new Process("python3 " . app_path() . '/Python/password.py ' . $arg);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $data = $process->getOutput();

        return $data;
    }
````

If you want to pass parameters to the python script you can do it like this.

```
$process = new Process(['python3', app_path() . '/Python/password.py', $arg]);
```

- #### With shell_exec

With shell_exec, another lib is not needed

```
   public function command()
    {
        $arg = "command";
        $command = escapeshellcmd("python3 " . app_path() . '/Python/password.py ' . $arg);
        $output = shell_exec($command);
        return $output;
    }
```
