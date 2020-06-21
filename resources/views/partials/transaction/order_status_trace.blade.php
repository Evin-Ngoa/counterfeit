<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="orderStatusViewModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="os-icon os-icon-mail-14"></i> Traceability Report For Order Status View</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
            </div>
            <div class="modal-body">
                <!-- Stripped Tables -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-left">Order ID</th>
                                <th class="text-left">Order Status</th>
                                <th class="text-left">participantInvoking</th>
                                <th class="text-left">updatedAt</th>
                                <th class="text-left">timestamp</th>
                            </tr>
                        </thead>
                        <tbody id="order_status">
                             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>