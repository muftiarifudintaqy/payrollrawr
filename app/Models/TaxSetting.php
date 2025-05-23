<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxSetting extends Model
{
    // Jika nama tabel bukan "tax_settings", kamu bisa set manual seperti ini:
    // protected $table = 'nama_tabel_anda';

    // Kolom-kolom yang bisa diisi
  protected $fillable = ['name', 'rate', 'description'];

}
