<?php
namespace ZinCelestial\Platform\Ledger;interface LedgerContract{public function record(array $transaction);public function reverse($transaction_id,$reason);}
