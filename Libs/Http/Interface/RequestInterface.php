<?php

namespace Libs\Http\Interface;

/**
 * Interface pour la classe Request
 */
interface RequestInterface
{
    /**
     * Obtient la méthode HTTP de la requête (ex: GET, POST, etc.).
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Obtient l'URI de la requête (ex: /api/utilisateurs).
     *
     * @return string
     */
    public function getUri(): string;
}
