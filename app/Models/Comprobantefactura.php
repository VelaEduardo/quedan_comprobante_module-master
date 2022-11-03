<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobantefactura extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'comprobantefacturas';

    protected $fillable = ['factura_id','comprobante_id','hiden'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function comprobante()
    {
        return $this->hasOne('App\Models\Comprobante', 'id', 'comprobante_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function factura()
    {
        return $this->hasOne('App\Models\Factura', 'id', 'factura_id');
    }
    
}
