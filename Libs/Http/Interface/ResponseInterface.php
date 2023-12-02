<?php
namespace Libs\Http\Interface;

interface ResponseInterface
{
    /**
     * Récupère les en-têtes de la réponse.
     *
     * @return array
     */
    public function getHeaders(): array;

    /**
     * Récupère le code HTTP de la réponse.
     *
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Récupère le corps de la réponse.
     *
     * @return string
     */
    public function getBody(): string;

    /**
     * Récupère la localisation de la redirection, s'il y en a une.
     *
     * @return string|null
     */
    public function getLocation(): ?string;

    /**
     * Ajoute un en-tête à la liste des en-têtes de la réponse.
     *
     * @param string $header
     * @return self
     */
    public function addHeader(string $header): self;

    /**
     * Définit le code HTTP de la réponse.
     *
     * @param int $code
     * @return self
     */
    public function setStatusCode(int $code): self;

    /**
     * Définit le corps de la réponse.
     *
     * @param string $body
     * @return self
     */
    public function setBody(string $body): self;

    /**
     * Définit la localisation de la redirection.
     *
     * @param string $redirection
     * @return self
     */
    public function setLocation(string $redirection): self;

    /**
     * Envoie la réponse HTTP au client.
     */
    public function send();
}
