<?php

namespace App\Commands;

class ListCommand
{
    /**
     * Registros por página
     * @var integer
     */
    private $perPage;

    /**
     * Texto de búsqueda
     * @var string|null
     */
    private $searchText;

    /**
     * Constructor
     * @param int $perPage
     * @param string|null $searchText
     */
    public function __construct(int $perPage, ?string $searchText)
    {
        $this->perPage = $perPage;
        $this->searchText = $searchText;
    }

    /**
     * Get texto de búsqueda
     *
     * @return  string|null
     */
    public function getSearchText()
    {
        return $this->searchText;
    }

    /**
     * Get registros por página
     *
     * @return  integer
     */
    public function getPerPage()
    {
        return $this->perPage;
    }
}
