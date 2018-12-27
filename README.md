# Redis mutex for Lumen
redis 分布式锁


## install

	composer require youngyezi/mutex 

			
## usge
    use Youngyezi\Mutex\Mutex;
    
    
    $mutex = new Mutex();
    
    if( $mutex->lock("test") ) {
    
        //do something
        
        ...
        
        $mutex->unlock("test");
    }