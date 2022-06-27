import React, {useEffect} from "react";
import { Center, Button, Flex, Radio, RadioGroup, Stack, AbsoluteCenter, Spinner } from "@chakra-ui/react";
import AppCard from "../../components/Shared/AppCard";
import { connector, VotePageProps } from "./props";
import useNotify from "../../hooks/Notify";
import { CheckCircleIcon } from "@chakra-ui/icons";
import { PollOptionType } from "../../types/Poll";
import { useParams } from "react-router-dom";

const VotePage: React.FC<VotePageProps> = ({ createVote, poll, voted, fetching, voting, fetchVotePoll, error, message }) => {
    const [ option, setOption ] = React.useState('')
    const { NotifyError, NotifySuccess } = useNotify()
    const { id } = useParams();

    useEffect(() => {
        id && fetchVotePoll(id)
    }, [])

    useEffect(() => {
        error && NotifyError(error)
    }, [error])

    useEffect(() => {
        message && NotifySuccess(message)
    }, [message])

    if (fetching) {
        return <AbsoluteCenter>
            <Spinner />
        </AbsoluteCenter>
    }

    if (!poll) {
        return <span>Poll not found...</span>
    }

    return <Center>
        <AppCard title={poll.description}>
            <RadioGroup onChange={setOption} value={option} isDisabled={voting || voted}>
                <Stack direction='column' gap={5}>{poll.options.map((option: PollOptionType) => {
                    return <Radio key={option.id} value={JSON.stringify(option.id)}>{option.description}</Radio>
                })}</Stack>
            </RadioGroup>
            <Flex direction={'row'} justifyContent={'flex-end'} paddingTop={5}>
                <Button
                    colorScheme={'blue'}
                    variant={'solid'}
                    onClick={() => createVote(JSON.parse(option) as PollOptionType)}
                    isLoading={voting}
                    disabled={!option || voted}
                >{voted && <CheckCircleIcon mr={2} />}Vote</Button>
            </Flex>
        </AppCard>
    </Center>
}

export default connector(VotePage)
