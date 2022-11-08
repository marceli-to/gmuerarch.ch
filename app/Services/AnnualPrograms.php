<?php
namespace App\Services;
use App\Models\AnnualProgram;
use Illuminate\Http\Request;

class AnnualPrograms
{ 
  /**
   * Get files by periode
   * 
   * @param String $type
   */
  
  public function filesByPeriode()
  {
    $annuals = AnnualProgram::published()->with('publishedFiles')->orderBy('periode_end', 'DESC')->get();
    $annualsGrouped = $annuals->groupBy('periode');
    $files = [];
    foreach($annualsGrouped->all() as $periode => $annuals)
    {
      foreach($annuals as $annual)
      {
        foreach($annual->files as $file)
        {
          $files[$periode][] = $file;
        }
      }
    }
    return $files;
  }
}
