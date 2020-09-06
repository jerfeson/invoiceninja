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

namespace App\Events\Task;

use App\Models\Company;
use App\Models\Task;
use Illuminate\Queue\SerializesModels;

/**
 * Class TaskWasDeleted.
 */
class TaskWasDeleted
{
    use SerializesModels;

    /**
     * @var Task
     */
    public $task;

    public $company;

    public $event_vars;

    /**
     * Create a new event instance.
     *
     * @param Task $task
     */
    public function __construct(Task $task, Company $company, array $event_vars)
    {
        $this->task = $task;
        $this->company = $company;
        $this->event_vars = $event_vars;
    }
}
