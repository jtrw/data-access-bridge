<?php
namespace Jtrw\DataAccessBridge;

trait ExceptionHandleTrait
{
    /**
     * @param \Throwable $exp
     * @return array
     */
    public function handleException(\Throwable $exp): array
    {
        return [
            'status'  => 'error',
            'message' => $exp->getMessage()
        ];
    } // end handleException
}