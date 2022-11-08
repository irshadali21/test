
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>VAT N.</th>
                        <th>COMPANY NAME</th>
                        <th>PHONE NUMBER</th>
                        <th>CUSTOMER EMAIL</th>
                        <th>TYPE OF BENEFIT</th>
                        <th>YEAR OF BENEFIT</th>
                        <th>CERTIFICATE STATUS</th>
                        <th>INCARICO SEND DATE</th>
                        <th>CERTIFICATION ISSUE DATE</th>
                        <th>DATE PAYMENT</th>
                        <th>FEE</th>
                        <th>ADVISOR NAME</th>
                        <th>E-MAIL OPERATION</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($files) --}}
                    @foreach ($files as $file)
                        {{-- {{ dd($file) }} --}}
                        @php
                            
                            $EmailTrack = $file->EmailTrack;
                            $Certificate = $file->certificate;
                            
                            $benefit = $file->benefit;
                            $company = $file->company;
                            $advisor = $file->advisor;
                            $CertificateSendDate = '-';
                            $IncaricoSendDate = '-';
                            $datePayment = '-';
                            
                            if ($file->EmailTrack) {
                                foreach ($file->EmailTrack as $track) {
                                    if ($track) {
                                        if ($Certificate) {
                                            if ($track->model == 'App\Models\Certificate') {
                                                $CertificateSendDate = (string) $track->date;
                                            }
                                        }
                                        if ($track->model == 'App\Models\File::CLI') {
                                            $IncaricoSendDate = (string) $track->date;
                                        }
                                    }
                                }
                            }
                            
                        @endphp
                        @if ($Certificate)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $company->vat_number }}</td>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->phone_number }}</td>
                                <td>{{ $file->customer_email }}</td>
                                <td>{{ $benefit->column1 }}</td>
                                <td>{{ $file->year }}</td>
                                <td>
                                    @php
                                        if ($Certificate) {
                                            if ($Certificate->status == 1) {
                                                echo 'certified and already paid';
                                                $datePayment = $Certificate->paid_date;
                                            } elseif (strlen($CertificateSendDate) > 1) {
                                                echo 'certified and unpaid';
                                            }
                                        } else {
                                            echo 'to be certified';
                                        }
                                    @endphp
                                </td>
                                <td>{{ $CertificateSendDate }}</td>
                                <td>{{ $IncaricoSendDate }}</td>
                                <td>{{ $datePayment }}</td>
                                <td>{{ $file->fee }}</td>
                                <td>
                                    @if (isset($advisor->name))
                                        {{ $advisor->name }}
                                    @endif
                                </td>
                                <td>{{ $file->opration_email }}</td>

                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
