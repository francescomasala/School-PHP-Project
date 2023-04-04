<?php

namespace webParticle;

class Sections
{
    public function callHeader(): string{
        ob_start();
        require_once('../../snippets/header.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function callFooter(): string{
        ob_start();
        require_once('../../snippets/footer.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}
