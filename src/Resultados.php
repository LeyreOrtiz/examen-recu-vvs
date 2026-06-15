<?php
namespace ExamenRecuVvs;
interface Resultados
{
    public function getResultado(string $partido): ?string;
}