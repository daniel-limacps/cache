<?php


    
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$cache = new FilesystemAdapter(
    // Nome do namespace (prefixo dos arquivos de cache)
    '_cache_',
    // Tempo de vida padrão (em segundos) para itens de cache
    3600,
    // Diretório onde os arquivos de cache serão armazenados
    'C:\Users\AppData\Local\Temp\cache'
);
