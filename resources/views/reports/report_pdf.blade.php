
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('lang.VAT Number') }}</th>
                        <th>{{ __('lang.Company Name') }}</th>
                        <th>{{ __('lang.Phone Number') }}</th>
                        <th>{{ __('lang.Customer Email') }}</th>
                        <th>{{ __('lang.Type of Benefits') }}</th>
                        <th>{{ __('lang.Year') }}</th>
                        <th>{{ __('lang.Certificat status') }}</th>
                        <th>{{ __('lang.Incarico Send Date') }}</th>
                        <th>{{ __('lang.Certification Issue Date') }}</th>
                        <th>{{ __('lang.DATE PAYMENT') }}</th>
                        <th>{{ __('lang.Fee') }}</th>
                        <th>{{ __('lang.Advisor Name') }}</th>
                        <th>{{ __('lang.E-Mail Operation') }}</th>
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
                                                echo __('lang.CERTIFIED AND PAID');
                                                $datePayment = $Certificate->paid_date;
                                            } elseif (strlen($CertificateSendDate) > 1) {
                                                echo __('lang.certified and unpaid');
                                            }
                                        } else {
                                            echo __('lang.TO BE CERTIFIED');
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
