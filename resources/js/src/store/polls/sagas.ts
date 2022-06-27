import { all, call, put, takeEvery } from 'redux-saga/effects'
import { PollsActionCreators, NotificationsActionCreators } from '..';
import {
    CreatePollFailedAction,
    CreatePollRequestAction,
    CreatePollSuccessAction,
    FetchPollsRequestAction, FinishPollFailedAction, FinishPollRequestAction, FinishPollSuccessAction,
    PollsActionsEnum
} from "./types";
import Api from "../../http/api";
import { AxiosResponse } from "axios";

function* fetchPollsRequest (action: FetchPollsRequestAction) {
    try {
        const response: AxiosResponse = yield call(Api.get, '/polls')
        yield put(PollsActionCreators.fetchPollsSuccess(response.data.body))
    }
    catch (error: any) {
        yield put(PollsActionCreators.fetchPollsFailed(error.response.data.error))
    }
}

function* createPollRequest (action: CreatePollRequestAction) {
    try {
        const poll = {
            ...action.payload,
            options: action.payload.options.map(option => option.description)
        }
        const response: AxiosResponse = yield call(Api.post, '/polls/create', poll)
        yield put(PollsActionCreators.createPollSuccess())
    }
    catch (error: any) {
        yield put(PollsActionCreators.createPollFailed(error.response.data.error))
    }
}

function* createPollSuccess (action: CreatePollSuccessAction) {
    yield put(PollsActionCreators.fetchPollsRequest())
    yield put(NotificationsActionCreators.addNotification({
        status: 'success',
        message: 'Poll successfully created :)'
    }))
}

function* createPollFailed (action: CreatePollFailedAction) {
    yield put(NotificationsActionCreators.addNotification({
        status: 'error',
        message: action.payload
    }))
}

function* finishPollRequest (action: FinishPollRequestAction) {
    try {
        const response: AxiosResponse = yield call(Api.post, `/polls/${action.payload}/finish`)
        yield put(PollsActionCreators.finishPollSuccess(action.payload))
    }
    catch (error: any) {
        yield put(PollsActionCreators.finishPollFailed(error.response.data.error))
    }
}

function* finishPollSuccess (action: FinishPollSuccessAction) {
    yield put(NotificationsActionCreators.addNotification({
        status: 'success',
        message: 'Poll successfully finished :)'
    }))
}

function* finishPollFailed (action: FinishPollFailedAction) {
    yield put(NotificationsActionCreators.addNotification({
        status: 'error',
        message: action.payload
    }))
}

function* sagas() {
    yield all([
        takeEvery(PollsActionsEnum.FETCH_POLLS_REQUEST, fetchPollsRequest),
        takeEvery(PollsActionsEnum.CREATE_POLL_REQUEST, createPollRequest),
        takeEvery(PollsActionsEnum.CREATE_POLL_SUCCESS, createPollSuccess),
        takeEvery(PollsActionsEnum.CREATE_POLL_FAILED, createPollFailed),
        takeEvery(PollsActionsEnum.FINISH_POLL_REQUEST, finishPollRequest),
        takeEvery(PollsActionsEnum.FINISH_POLL_SUCCESS, finishPollSuccess),
        takeEvery(PollsActionsEnum.FINISH_POLL_FAILED, finishPollFailed)
    ]);
}

export default sagas
