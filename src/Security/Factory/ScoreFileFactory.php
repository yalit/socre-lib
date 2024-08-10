<?php

namespace App\Security\Factory;

use App\Entity\Library\ScoreFile;
use SplFileInfo;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Uid\Uuid;

readonly class ScoreFileFactory
{
    public function __construct(
        private string $scoreFileUploadDir
    ) {}

    public function createFromUploadedFile(UploadedFile $uploadedFile, ?ScoreFile &$scoreFile = null): ScoreFile
    {
        $scoreFile = $scoreFile ?? new ScoreFile();
        $uploadedFileName = implode('.', array_slice(explode('.', $uploadedFile->getClientOriginalName()), 0, -1));
        $uploadedFileExtension = implode('', array_slice(explode('.', $uploadedFile->getClientOriginalName()), -1));
        $scoreFile->setName($scoreFile->getName() ?? $uploadedFileName);
        $scoreFile->setExtension($uploadedFileExtension);

        $uniqueFileName = sprintf('%s_%s.%s', (Uuid::v4())->toString(), $scoreFile->getName(), $uploadedFile->guessExtension());
        $path = $this->scoreFileUploadDir . '/' . $uniqueFileName;

        $scoreFile->setPath($path);
        $scoreFile->setMimeType($uploadedFile->getClientMimeType());
        $scoreFile->setSize($uploadedFile->getSize());

        $uploadedFile->move($this->scoreFileUploadDir, $uniqueFileName);
        return $scoreFile;
    }
}
