<?php

namespace Libs\Http;
use Libs\Http\Interface\ResponseInterface;

class Response implements ResponseInterface
{

    /**
     * entete (header) a envoyer
     *
     * @var array
     */
    protected array $headers = [];


    /**
     * code http à envoyer
     *
     * @var integer
     */
    protected int $statusCode = 200;

    /**
     * corps du message a envoyer(html ou json...)
     *
     * @var string
     */
    protected string $body = '';


    /**
     * redirection
     *
     * @var string|null
     */
    protected ?string $location = null;

    /**
     * Listes des entetes(headers)
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * code http à envoyer
     * 
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * corps du message a envoyer(html ou json...)
     * 
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * redirection
     * 
     * @return 
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function __construct(int $statusCode = 200, array $headers = [], string $body = '')
    {

        $this->setStatusCode($statusCode);

        foreach ($headers as $key => $header) {
            $this->addHeader($header);
        }

        $this->setBody($body);

    }



    /**
     * ajoute un header a la liste
     *
     * @param string $header
     * @return self
     */
    public function addHeader(string $header): self
    {
        $this->headers[] = $header;
        return $this;
    }
    /**
     * modifie le status du code
     *
     * @param integer $code
     * @return self
     */
    public function setStatusCode(int $code): self
    {
        $this->statusCode = $code;
        return $this;
    }
    /**
     * modifie
     *
     * @param string $body
     * @return self
     */
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;

    }
    /**
     * ecris une redirection
     *
     * @param string $body
     * @return self
     */
    public function setLocation(string $redirection): self
    {
        $this->location = $redirection;
        return $this;

    }
    /**
     * envoie la reponse
     */
    public function send()
    { //on ecris les entetes
        foreach ($this->headers as $key => $header) {
            header($header);

        }
        //on ecrie le code http
        http_response_code($this->statusCode);

        //si redirection on signal
        if (!empty($this->location)) {
            header('Location:' . $this->location);
        }
        //on ecrit le body
        echo $this->body;

    }

}