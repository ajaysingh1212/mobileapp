<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOtpRequest;
use App\Http\Requests\StoreOtpRequest;
use App\Http\Requests\UpdateOtpRequest;
use App\Models\Otp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtpController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('otp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otps = Otp::all();

        return view('admin.otps.index', compact('otps'));
    }

    public function create()
    {
        abort_if(Gate::denies('otp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otps.create');
    }

    public function store(StoreOtpRequest $request)
    {
        $otp = Otp::create($request->all());

        return redirect()->route('admin.otps.index');
    }

    public function edit(Otp $otp)
    {
        abort_if(Gate::denies('otp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otps.edit', compact('otp'));
    }

    public function update(UpdateOtpRequest $request, Otp $otp)
    {
        $otp->update($request->all());

        return redirect()->route('admin.otps.index');
    }

    public function show(Otp $otp)
    {
        abort_if(Gate::denies('otp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otps.show', compact('otp'));
    }

    public function destroy(Otp $otp)
    {
        abort_if(Gate::denies('otp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otp->delete();

        return back();
    }

    public function massDestroy(MassDestroyOtpRequest $request)
    {
        $otps = Otp::find(request('ids'));

        foreach ($otps as $otp) {
            $otp->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
