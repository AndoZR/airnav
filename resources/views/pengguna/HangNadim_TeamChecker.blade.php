@extends('pengguna.app')
@section('tab', 'HangNadim_TeamChecker')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="body genealogy-body genealogy-scroll">
        <div class="genealogy-tree">
            <ul class="active">
                <li>
                    <a href="javascript:void(0);">
                        <div class="member-view-box">
                            <div class="tree">
                                <p><span>Bp. Agung Dwi Hanggoro</span><br><span>GM. Airnav Cabang Tanjung Pinang</span></p>
                            </div>
                        </div>
                    </a>
                    <ul class="active">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="member-view-box">
                                    <div class="tree">
                                        <p><span>Bp. Ikram</span><br><span>Kepala Cabang Pembantu Batam</span></p><br>
                                    </div>
                                </div>
                            </a>
                            <ul class="active">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                            <div class="tree">
                                                <p><span>Bp. Sangaji Nugraha</span><br><span>Tim Checker</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                            <div class="tree">
                                                <p><span>Bp. Ronald Darma Putra</span><br><span>Tim Checker</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                            <div class="tree">
                                                <p><span>Bp. Rizky Auditama Cahyono</span><br><span>Tim Checker</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

