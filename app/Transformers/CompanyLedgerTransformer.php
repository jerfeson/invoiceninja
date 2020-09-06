<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2020. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Transformers;

use App\Models\CompanyLedger;
use App\Utils\Traits\MakesHash;

/**
 * Class CompanyLedgerTransformer.
 */
class CompanyLedgerTransformer extends EntityTransformer
{
    use MakesHash;

    /**
     * @param ClientContact $company_ledger
     *
     * @return array
     */
    public function transform(CompanyLedger $company_ledger)
    {
        $entity_name = lcfirst(class_basename($company_ledger->company_ledgerable_type)).'_id';

        return [
            $entity_name => (string) $this->encodePrimaryKey($company_ledger->company_ledgerable_id),
            'notes' => (string) $company_ledger->notes ?: '',
            'balance' => (float) $company_ledger->balance,
            'adjustment' => (float) $company_ledger->adjustment,
            'activity_id' => (int) $company_ledger->activity_id,
            'created_at' => (int) $company_ledger->created_at,
            'updated_at' => (int) $company_ledger->updated_at,
            'archived_at' => (int) $company_ledger->deleted_at,
        ];
    }
}
