<h1>Laravel Facade for beginner</h1>
<p>Facades provide a "static" interface to classes that are available in the application's service container.</p>
<h2>Create facade</h2>
<p>Create the following files:</p>
<p>1. <code>app/Services/Foobar.php</code></p>
<blockquote><?php<br/>
namespace App\Services;<br/>
<br/>
class Foobar {<br/>
 public function show() {<br/>
  return 'Hello World';<br/>
}<br/>
}</blockquote>
<p>2. <code>app/Facades/Foobar.php</code></p>
<blockquote><?php<br/>
namespace App\Facades;<br/>
use Illuminate\Support\Facades\Facade;<br/>
class Foobar extends Facade {<br/>
 public static function getFacadeAccessor() {<br/>
  return 'foobar';<br/>
 }<br/>
 }</blockquote>
<p>3. <code>app/Providers/FoobarServiceProvider.php</code></p>
<blockquote><?php<br/>
namespace App\Providers;<br/>
use Illuminate\Support\ServiceProvider;<br/>
use App\Services\Foobar;<br/>
class FoobarServiceProvider extends ServiceProvider<br/>
{<br/>
    /**<br/>
     * Bootstrap any application services.<br/>
     *<br/>
     * @return void<br/>
     */
    public function boot()<br/>
    {<br/>
        //<br/>
    }<br/>
    /**<br/>
     * Register any application services.<br/>
     *<br/>
     * @return void<br/>
     */<br/>
    public function register()<br/>
    {<br/>
        $this->app->singleton('foobar', function() {<br/>
   return new Foobar;<br/>
  });<br/>
    }<br/>
}</blockquote>
<p>4. Now, open the file <code>config/app.php</code> and add the service provider to providers array:</p>
<blockquote>App\Providers\FoobarServiceProvider::class,</blockquote>
<p>5. Inside <code>config/app.php</code> add the alias of Foobar to aliases array:</p>
<blockquote>'Foobar' => App\Facades\Foobar::class,</blockquote>
<p>6. Add the following route into <code>routes/web.php</code></p>
<blockquote>
Route::get('/foobar', function () {<br/>
    return Foobar::show();<br/>
});
</blockquote>
<p>7. Now when you go to the <code>'/foobar'</code> address you will get a 'Hello World' message.</p>