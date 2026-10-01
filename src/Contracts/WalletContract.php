<?php
namespace ZinCelestial\Platform\Wallets;interface WalletContract{public function balance($owner_id);public function credit($owner_id,$amount,$reference,$metadata=array());public function debit($owner_id,$amount,$reference,$metadata=array());}
