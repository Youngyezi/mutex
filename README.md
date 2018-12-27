# Redis mutex for Lumen
redis 分布式锁


## usge
    $mutex = app('mutex');
    
    if( $mutex->lock("test") ) {
        //do something
        
        ...
        
        $mutex->unlock("test");
    }