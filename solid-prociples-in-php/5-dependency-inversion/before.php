<?php

// Le classi di livello più alto non devono dipendere da quelle di livello più basso.
// Entrambe dovrebbero dipendere da astrazioni. Le astrazioni non dovrebbero mai dipendere dai dettagli.
// I dettagli dovrebbero dipendere da astrazioni.

// se ho una classe che utilizza un altra classe al suo interno, la classe esterna non dovrebbe mai implementare una classe specifica
// ma la sua astrazione quindi l'interfaccia in modo da essere facilemente intercambiabile

// così sto violando questo principio perchè sto limitando la classe Logger a ricevere come parametro un oggetto di tipo TextFileLogWriter
// ma cosa succede se volessimo utilizzare la classe che scrive su db al posto del file?

class Logger {

    private $textFileLogWriter;

    public function __construct(TextFileLogWriter $textFileLogWriter)
    {
        $this->textFileLogWriter = $textFileLogWriter;
    }

    public function error($text)
    {
        $this->textFileLogWriter->write('ERROR: ' . $text);
    }

    public function warning($text)
    {
        $this->textFileLogWriter->write('Warning: ' . $text);
    }

    public function info($text)
    {
        $this->textFileLogWriter->write('Info: ' . $text);
    }

}

class TextFileLogWriter {

    public function write($text)
    {
        // scrivo il testo che mi viene passato in un file di log
        // sul filesystem
    }

}

$logWriter = new TextFileLogWriter;
$logger = new Logger($logWriter);

$logger->error('Azione non permessa dell\'utente X');