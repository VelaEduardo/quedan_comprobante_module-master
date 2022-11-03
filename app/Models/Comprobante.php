<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'comprobantes';

    protected $fillable = ['serie','fecha_com','can_total','hiden','fuente_id','proyecto_id','proveedor_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comprobantefacturas()
    {
        return $this->hasMany('App\Models\Comprobantefactura', 'comprobante_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuente()
    {
        return $this->hasOne('App\Models\Fuente', 'id', 'fuente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
    }
    
}
