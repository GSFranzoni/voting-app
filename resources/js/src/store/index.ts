import { applyMiddleware, combineReducers, createStore } from '@reduxjs/toolkit';
import AuthReducer from "./auth/reducers";
import {AuthInitialState, AuthState} from "./auth/types";
import { composeWithDevTools } from 'redux-devtools-extension';
import createSagaMiddleware from 'redux-saga';
import { sagas } from "./sagas";
import {VoteInitialState, VoteState} from "./vote/types";
import VoteReducer from "./vote/reducers";
import {PollsInitialState, PollsState} from "./polls/types";
import PollsReducer from "./polls/reducers";
import {NotificationsInitialState, NotificationsState} from "./notifications/types";
import NotificationsReducer from "./notifications/reducers";
const sagaMiddleware = createSagaMiddleware();

export type AppState = {
    auth: AuthState,
    vote: VoteState,
    polls: PollsState,
    notifications: NotificationsState
}

export const APP_INITIAL_STATE: AppState = {
    auth: AuthInitialState,
    vote: VoteInitialState,
    polls: PollsInitialState,
    notifications: NotificationsInitialState
}

export const store = createStore(
    combineReducers({
        auth: AuthReducer,
        vote: VoteReducer,
        polls: PollsReducer,
        notifications: NotificationsReducer
    }),
    {},
    composeWithDevTools(applyMiddleware(sagaMiddleware))
)

sagaMiddleware.run(sagas);

export type RootState = ReturnType<typeof store.getState>

export type AppDispatch = typeof store.dispatch

export * as AuthActionCreators from './auth/actions'

export * as VoteActionCreators from './vote/actions'

export * as PollsActionCreators from './polls/actions'

export * as NotificationsActionCreators from './notifications/actions'
