<?php

namespace SimpleCMS\Nickname\Packages;

use Exception;
use function mt_rand;
use function shuffle;
use function finfo_file;
use function finfo_open;
use function file_exists;
use function finfo_close;
use function array_filter;
use function array_values;
use function array_key_exists;

class Nickname
{
    protected string $mode;
    protected int $append_length;
    protected array $paths = [];
    protected array $dicts = [];
    protected array $adjectiveDicts = [];

    public function __construct()
    {
        $this->mode = 'name';// config('cms_nickname.mode', 'name');
        $this->append_length = 4;// (int) config('cms_nickname.append_length', 4);
        $this->paths = [];// (array) config('cms_nickname.dicts', []);
    }

    private function loadDict(): void
    {
        $dictPath = $this->getFile($this->mode);
        $this->dicts = [];
        if ($this->isJsonFile($dictPath)) {
            $this->dicts = array_merge($this->dicts, json_decode(file_get_contents($dictPath), true));
        }
        $this->loadAdjective();
    }

    private function loadAdjective(): void
    {
        if ($this->mode == 'noun') {
            $dictPath = $this->getFile('adjective');
            $this->adjectiveDicts = [];
            if ($this->isJsonFile($dictPath)) {
                $this->adjectiveDicts = array_merge($this->adjectiveDicts, json_decode(file_get_contents($dictPath), true));
            }
        }
    }

    private function getPath(string $name): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $name . '.json';
    }

    private function getFile(string $name): string
    {
        $defaultPath = $this->getPath($name);
        if (array_key_exists($name, $this->paths) && $this->paths[$name]) {
            $defaultPath = $this->paths[$name];
        }
        return $defaultPath;
    }

    private function isJsonFile(string $path): bool
    {
        if (!file_exists($path)) {
            throw new Exception("The file does not exist.");
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $path);
        finfo_close($finfo);
        return $mimeType == 'application/json';
    }

    /**
     * @param int $num
     * @return array|string
     */
    public function generate(int $num = 1): array|string
    {
        $this->loadDict();
        $num = $num < 1 ? 1 : $num;
        $nicknames = [];
        for ($i = 0; $i < $num; $i++) {
            $nickname = $this->generateNickname();
            $nicknames[] = $nickname;
        }
        $this->clearDict();
        return $num == 1 ? $nickname : $nicknames;
    }

    private function clearDict(): void
    {
        $this->dicts = [];
        $this->adjectiveDicts = [];
    }

    private function generateNickname(): string
    {
        return match ($this->mode) {
            'name' => $this->generateNameNickname(),
            'noun' => $this->generateNounNickname(),
            'nickname' => $this->generateSingleNickname(),
            default => $this->generateSingleNickname()
        };
    }

    private function generateNameNickname(): string
    {
        $nameDicts = array_values(array_filter($this->dicts));
        shuffle($nameDicts);
        return $nameDicts[0] . $nameDicts[1] . $this->generateRandomNumbers($this->append_length);
    }

    private function generateNounNickname(): string
    {
        $adjectiveDicts = array_values(array_filter($this->adjectiveDicts));
        shuffle($adjectiveDicts);
        $nameDicts = array_values(array_filter($this->dicts));
        shuffle($nameDicts);
        return $adjectiveDicts[0] . $nameDicts[0] . $this->generateRandomNumbers($this->append_length);
    }

    private function generateSingleNickname(): string
    {
        $nameDicts = array_values(array_filter($this->dicts));
        shuffle($nameDicts);
        return $nameDicts[0] . $this->generateRandomNumbers($this->append_length);
    }

    private function generateRandomNumbers(int $length): string
    {
        $randomNumbers = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumbers .= mt_rand(0, 9);
        }
        return $randomNumbers;
    }
}