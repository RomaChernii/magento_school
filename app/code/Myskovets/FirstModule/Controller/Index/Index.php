<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Myskovets\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;

class Index extends AbstractAction
{
    public function execute()
    {
        echo '
<script>
    alert("Hello from my module!");
    let time = 0;
    setInterval(() => {
        time += 1;
        console.log(`Current client time: ${time}`);
    }, 1000);
</script>
<h1>
    Hello from my module! <code>Check out F12 => Console</code>!
</h1>
';
        exit();
    }
}
