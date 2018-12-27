# Redis mutex for Lumen
redis 分布式锁


## install

	composer require youngyezi/mutex 
	
## register service provider `bootstrap\app.php`

	$app->register(Youngyezi\Mutex\MutexServiceProvider::class);
			
## usge
    $mutex = app('mutex');
    
    if( $mutex->lock("test") ) {
    
        //do something
        
        ...
        
        $mutex->unlock("test");
    }
