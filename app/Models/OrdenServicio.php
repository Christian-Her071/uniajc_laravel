<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenServicio extends Model
{
    use HasFactory; 
    
    protected $table = 'orden_de_servicio'; 
    // La llave se llama id y la tabla tiene created_at/updated_at: 
    // // no se cambia $primaryKey ni se apaga $timestamps. 
    public const TIPOS_SERVICIO = ['Instalación', 'Reparación', 'Mantenimiento']; 
    public const PRIORIDADES = ['Baja', 'Media', 'Alta', 'Urgente']; 
    public const ESTADOS = ['Pendiente', 'En Proceso', 'Cerrada', 'Cancelada']; 

    protected $fillable = [ 'cliente_id', 'usuario_id', 'codigo_orden', 'descripcion', 'tipo_servicio', 'prioridad', 'estado', 'fecha_cierre_estimada', 
    ]; 
    
    protected $casts = [ 'fecha_cierre_estimada' => 'date', ]; public function cliente() { return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente'); 
    } 
    
    public function usuario() { return $this->belongsTo(Usuario::class, 'usuario_id', 'id_usuario'); 
    }
}
