<?php

namespace Classes;

class  Paginacion {

   public $pagina_actual;
   public $regitros_x_pagina;
   public $total_registros;

   public function __construct($pagina_actual = 1, $regitros_x_pagina = 10, $total_registros = 0) {
      $this->pagina_actual = (int) $pagina_actual;
      $this->regitros_x_pagina = (int) $regitros_x_pagina;
      $this->total_registros = (int) $total_registros;
   }

   public function offet() {
      return $this->regitros_x_pagina * ($this->pagina_actual - 1);
   }

   public function totalPaginas() {
      return ceil($this->total_registros / $this->regitros_x_pagina);
   }

   public function paginaAnterior() {
      $anterior = $this->pagina_actual - 1;
      return ($anterior > 0 ) ? $anterior : false;
   }

   public function paginaSiguiente() {
      $siguiente = $this->pagina_actual + 1;
      return ($siguiente <= $this->totalPaginas()) ? $siguiente : false;
   }

   public function enlaceAnterior() {
      $html = '';
      if($this->paginaAnterior()) {
         $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaAnterior()}\">&laquo; Anterior</a>";
      }
      return $html;
   }

   public function enlaceSiguiente() {
      $html = '';
      if($this->paginaSiguiente()) {
         $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaSiguiente()}\">Siguiente &raquo;</a>";
      }
      return $html;
   }

   // public function numerosPagina() {
   //    $html = '';
   //    for ($i = 1; $i <= $this->totalPaginas(); $i++) { 
   //       if($i === $this->pagina_actual) {
   //          $html .= "<span class=\"paginacion__enlace paginacion__enlace--actual\">{$i}</span>";
   //       } else {
   //          $html .= "<a class=\"paginacion__enlace paginacion__enlace--numero\" href=\"?page={$i}\">{$i}</a>";
   //       }
   //    }
   //    return $html;
   // }

   public function numerosPagina() {
      $html = '';
      $total_paginas = $this->totalPaginas();
      $current = $this->pagina_actual;

      if ($total_paginas <= 10) {
         for ($i = 1; $i <= $total_paginas; $i++) {
            $html .= $this->generarEnlace($i);
         }
      } else {
         // Always show first page
         $html .= $this->generarEnlace(1);

         if ($current > 3) {
            $html .= "<span class=\"paginacion__enlace paginacion__enlace--ellipsis\">...</span>";
         }

         // Show 2 pages before and after the current page
         $start = max(2, $current - 1);
         $end = min($total_paginas - 1, $current + 1);

         for ($i = $start; $i <= $end; $i++) {
            $html .= $this->generarEnlace($i);
         }

         if ($current < $total_paginas - 2) {
            $html .= "<span class=\"paginacion__enlace paginacion__enlace--ellipsis\">...</span>";
         }

         // Always show last page
         $html .= $this->generarEnlace($total_paginas);
      }

      return $html;
   }

   private function generarEnlace($pagina) {
      if ($pagina === $this->pagina_actual) {
         return "<span class=\"paginacion__enlace paginacion__enlace--actual\">{$pagina}</span>";
      } else {
         return "<a class=\"paginacion__enlace paginacion__enlace--numero\" href=\"?page={$pagina}\">{$pagina}</a>";
      }
   }

   public function paginacion() {
      $html = '';
      if($this->total_registros > 1) {
         $html .= '<div class="paginacion">';
         $html .= $this->enlaceAnterior();
         $html .= $this->numerosPagina();
         $html .= $this->enlaceSiguiente();
         $html .= '</div>';
      }
      return $html;
   }

}