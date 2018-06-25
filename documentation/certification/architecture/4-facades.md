# Facades

https://laravel.com/docs/5.6/facades

---------------

### Real-Time Facades

When the real-time facade is used,
the publisher implementation will be resolved out of the service container using the portion of the 
interface or class name that appears after the  Facades prefix.

```PHP
<?php

namespace App;

use Facades\App\Contracts\Publisher;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    /**
     * Publish the podcast.
     *
     * @return void
     */
    public function publish()
    {
        $this->update(['publishing' => now()]);

        Publisher::publish($this);
    }
}
```