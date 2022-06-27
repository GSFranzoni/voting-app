import React, {useEffect} from "react";
import { connector, PollsProps } from "./props";
import { VStack } from "@chakra-ui/react";
import AppLoading from "../Shared/AppLoading";
import { PollType } from "../../types/Poll";
import Poll from "../Poll";

const PollList = ({ polls, fetching, fetchPolls }: PollsProps) => {
    useEffect(() => {
        if (!polls.length) {
            fetchPolls()
        }
    }, [])
    return <VStack direction={['column', 'row']} flexWrap={'wrap'}>{polls.map((poll: PollType) =>
        <Poll {...poll as PollType} key={poll.id} />)}
        <AppLoading loading={!!fetching} />
    </VStack>
}

export default connector(PollList)
