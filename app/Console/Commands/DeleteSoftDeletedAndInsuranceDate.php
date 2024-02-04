<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Illuminate\Console\Command;

class DeleteSoftDeletedAndInsuranceDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:delete-soft-deleted-and-insurance-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the soft-deleted and vehicles with expired insurance date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Deleting soft-deleted records...');
        Vehicle::onlyTrashed()->forceDelete();
        $this->info('Soft-deleted records deleted successfully.');

        $this->info('Deleting vehicles with expired insurance_date...');
        $expiredVehicles = Vehicle::whereDate('insurance_date', '<', now())->get();
        $expiredVehicles->each->forceDelete();
        $this->info('Vehicles with expired insurance_date deleted successfully.');
    }
}
