import { all, call, put, takeEvery } from 'redux-saga/effects'
import { VoteActionCreators } from '..';
import { CreateVoteRequestAction, FetchVotePollRequestAction, VoteActionsEnum } from "./types";
import VoteService from "../../services/VoteService";

function* fetchVotePoll (action: FetchVotePollRequestAction) {
    try {
        // @ts-ignore
        const poll = yield call(VoteService.getPoll, action.payload)
        yield put(VoteActionCreators.fetchVotePollSuccess(poll))
    }
    catch (exception: any) {
        yield put(VoteActionCreators.fetchVotePollFailed(exception))
    }
}

function* createVote (action: CreateVoteRequestAction) {
    try {
        // @ts-ignore
        const poll = yield call(VoteService.createVote, action.payload)
        yield put(VoteActionCreators.createVoteSuccess('Vote created successfully :)'))
    }
    catch (exception: any) {
        yield put(VoteActionCreators.createVoteFailed(exception))
    }
}

function* sagas() {
    yield all([
        takeEvery(VoteActionsEnum.FETCH_VOTE_POLL_REQUEST, fetchVotePoll),
        takeEvery(VoteActionsEnum.CREATE_VOTE_REQUEST, createVote)
    ]);
}

export default sagas
