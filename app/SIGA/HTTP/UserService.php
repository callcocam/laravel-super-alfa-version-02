<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace SIGA\HTTP;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Cookie;

class UserService extends AbstractServices
{
    private $path = "v1/users";
    protected function services()
    {
        return $this->path;
    }
    public function auth($data)
    {
         $response = $this->request()->withHeaders([
            'Accept'=>'application/json',
            'Content-Type'=>'application/json',
        ])->post(sprintf("%s/oauth/token", $this->baseUri), [
            'grant_type' => 'password',
            'client_id' => config('cod.client_id', '92059072-4e01-4e58-9adc-2b3b549ef345'),
            'client_secret' => config('cod.client_secret', 'C3J8o4HwrTdRkeiLJmBkh3LYeqNRV0JLS0FDSzKT'),
            'username' => $data['email'],
            'password' => $data['password'],
            'scope' => '',
        ]);
        if ($response->successful()) {
            $this->path = "v1/user";
            $serverUser = $this->token($response->object()->access_token)->get();
            if($serverUser){
                $clientUser = User::find($serverUser->object()->id);
                if(!$clientUser){
                    $clientUser = User::factory()->create($serverUser->json());
                }
                $clientUser->password  = Hash::make($data['password']);
                $clientUser->token = $response->object()->access_token;
                $clientUser->update();
                Auth::login($clientUser);
                session()->flash('success', 'login realizado com sucesso!!');
                return redirect()->route('admin')->with('success', 'login realizado com sucesso!!')->withCookie(Cookie::create('token', $response->object()->access_token));
            }
            session()->flash('error',"NemnhuUsuário Encontrado");
            return redirect()->route('login');
         }
        session()->flash('error',$response->object()->message);
        return redirect()->route('login');
    }
}
