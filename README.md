# JWT Validity

JWT Validity, Laravel tymon/jwt için geliştirilmiş `database token storage` ve `yönetimini` içerir.

## Kurulum

```bash
composer require fatihozpolat/jwtvalidity
```
komutunu çalıştırarak paketi kurun.

config/jwt.php dosyasındaki:
```php
'storage' => Tymon\JWTAuth\Providers\Storage\Illuminate::class,
```
satırını:
```php
'storage' => FatihOzpolat\JWTValidity\Repository\JwtBlockedStorageRepository::class,
```
satırı ile değiştirin.

#### App\Models\User.php ya da Authenticatable olan her hangi bir model
```php
use FatihOzpolat\JWTValidity\User as FOUser;
...
...

class User extends FOUser
{
  ...
```

#### Auth Controller
```php
use FatihOzpolat\JWTValidity\Manager;
...
...

//login
if($token = auth()->attempt($credentials)){
  Manager::addToken($token);
  ...
  ...



//logout
$authHeader = request()->header('authorization');
$token = substr($authHeader, 7); //remove Bearer
Manager::removeToken($token);  
```


#### Bir kullanıcya ait tüm tokenleri engellemek için
```php
$user = User::find(1);
$res = Manager::blockTokens($user); //true or false
```
