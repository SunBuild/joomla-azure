#Joomla for Azure  [![Deploy to Azure](http://azuredeploy.net/deploybutton.png)](https://azuredeploy.net/)


To use Environment variables with Joomla application to pass in the database information , add the following constructor in configuration.php inside JConig class. To use this with [MySQL in app feature](https://azure.microsoft.com/en-us/blog/mysql-in-app-preview-app-service/),  use the $_SERVER['MYSQLCONNSTR_localdb]' variable to get the database connection string. 
```
public function __construct(){
	  $connectstr_dbhost = '';
		$connectstr_dbname = '';
		$connectstr_dbusername = '';
		$connectstr_dbpassword = '';
		foreach ($_SERVER as $key => $value) {
			if (strpos($key, "MYSQLCONNSTR_") !== 0) {
				continue;
			}
			
			$connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
			$connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
			$connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
			$connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
		}

        $this->user = $connectstr_dbusername;
        $this->host=$connectstr_dbhost;
        $this->password= $connectstr_dbpassword;
        $this->db= $connectstr_dbname;
        
    }

```

			
		
