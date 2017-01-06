# PHP Platform Error and logging management
This package provides uniform APIs for Error handling and logging

[![Build Status](https://travis-ci.org/PHPPlatform/errors.svg?branch=master)](https://travis-ci.org/PHPPlatform/errors)

## Introduction
This Package mainly solves 3 problems
 - Provides Exception types for all purposes, well categorized and with unique codes
 - Common way to log all Exceptions and Errors
 - Handles PHP System Errors and converts them into Exceptions 

### Exception Types
 Following Exception types are available for Application developers to use.
 - **PlatformException** `abstract` Parent of all exceptions , derived from Exception, all logging mechanism implemented here 
 
   - **PersistenceException** `abstract` Parent of all persistant exceptions, these exceptions to be used by Persistant layer
     - *BadQueryException*  
     - *DataNotFoundException*  
     - *NoAccessException*  
     - *NoConnectionException*  
     - *NoDuplicateException*  
     - *ReferenceIntegrityViolationException*
     
   - **ApplicationException** `abstract` Parent of all application exceptions, these exceptions to be used by Application/Business Layer
     - *BadInputException*
     - *Debug*
     - *NoAccessException*
     - *ProgrammingError*
          
   - **HttpException** `abstract` Parent of all Http exceptions, these exceptions to be used by View or Web Service Layers
     - *_1XX*  All exceptions for Informational Http Codes 
     - *_2XX*  All exceptions for Success Http codes 
     - *_3XX*  All exceptions for Redirectional Http codes 
     - *_4XX*  All exceptions for Client Error Http codes 
     - *_5XX*  All exceptions for Server Error Http codes 
     
   - **SystemException** `abstract` Parent of all System Exceptions generated from handling [PHP System Errors][PHPErrorConstants] 
     - *SystemError* For all Errors this Exception is created and thrown from ErrorHandler 
     - *SystemWarning* For all Warnings, This exception is not thrown by the ErrorHandler , instead this is created for the purpose of logging 
     
## Configuration 
Configurations available for this Package
> This Configuration is based on [PHPPlatform/config][PHPPlatformConfig]

``` JSON
{
    "logs":{  // log file paths for each category of exceptions
        "Persistence":null, 
	    "Application":null,
	    "Http":null,
	    "System":null
    },
    "traces":{ // trace file paths for each category of exceptions
        "Persistence":null,
	    "Application":null,
	    "Http":null,
	    "System":null
    }
}
```

To enable Error Handling , call error handling function as below
``` PHP
PhpPlatform\Errors\ErrorHandler::handleError();
```

[PHPErrorConstants]:http://php.net/manual/en/errorfunc.constants.php
[PHPPlatformConfig]:https://github.com/PHPPlatform/config